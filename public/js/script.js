function hideBrokenImage(img) {
    var card = $(img).closest('.movie-item');
    if (card.length > 0) {
        card.remove();
        if (typeof AOS !== 'undefined') {
            setTimeout(function () {
                AOS.refresh();
            }, 500);
        }
    }
}

window.addEventListener('error', function (e) {
    if (e.message && e.message.includes('setAttribute')) {
        e.stopImmediatePropagation(); 
        return true; 
    }
}, true);


let page = 1;
let isLoading = false;
let hasMore = true;

let urlSearch = new URLSearchParams(window.location.search).get('search');
let inputSearch = document.getElementById('searchInput') ? document.getElementById('searchInput').value : '';
let currentSearch = urlSearch || inputSearch || 'funny';

// --- HANDLE BROKEN IMAGE (PERFORMANCE MODE) ---
function handleImageError(image) {
    const cardContainer = $(image).closest('.movie-item');
    if (cardContainer.length > 0) {
        cardContainer.css('display', 'none');
    }
}

// --- TOAST NOTIFICATION (SAFE CHECK) ---
function showToast(message, type) {
    if (typeof Swal !== 'undefined') {
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            background: '#333',
            color: '#fff',
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        Toast.fire({
            icon: type,
            title: message
        });
    } else {
        console.warn('Swal belum siap:', message);
    }
}

// --- LOAD MOVIES ---
function loadMoreMovies() {
    if (isLoading || !hasMore) return;

    isLoading = true;
    $('.ajax-load').show();
    page++;
    $.ajax({
            url: '/movies',
            type: "GET",
            data: {
                search: currentSearch,
                page: page
            },
            datatype: "html"
        })
        .done(function (data) {
            if (!data || data.trim() === "") {
                $('.ajax-load').hide();
                $('.no-more-data').show();
                hasMore = false;
                isLoading = false;
                return;
            }

            $("#movie-container").append(data);
            $('.ajax-load').hide();
            isLoading = false;

            setTimeout(() => {
                if ($(document).height() <= $(window).height() && hasMore) {
                    loadMoreMovies();
                }
            }, 300);
        })
        .fail(function () {
            $('.ajax-load').hide();
            isLoading = false;
            page--;
        });
}

// --- 3D EFFECT (PERFORMANCE MODE) ---
$(document).ready(function () {
    const container = $('#movie-container');

    // Gunakan requestAnimationFrame agar hover tidak ngelag
    container.on('mousemove', '.movie-card', function (e) {
        const card = this;
        window.requestAnimationFrame(() => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const xRotation = -((y - rect.height / 2) / 20);
            const yRotation = (x - rect.width / 2) / 20;
            card.style.transform = `perspective(1000px) rotateX(${xRotation}deg) rotateY(${yRotation}deg) scale(1.05)`;
        });
    });

    container.on('mouseleave', '.movie-card', function () {
        this.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale(1)';
    });
});

// --- SCROLL EVENT ---
$(window).scroll(function () {
    if (window.scrollTimeout) clearTimeout(window.scrollTimeout);
    window.scrollTimeout = setTimeout(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 200) {
            loadMoreMovies();
        }
    }, 100);
});

// --- INIT ---
$(document).ready(function () {
    if ($('#movie-container').children().length === 0 || $(document).height() <= $(window).height()) {
        loadMoreMovies();
    }
});