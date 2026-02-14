let LANG = {};
let CURRENT_LANG = localStorage.getItem("lang") || "en";

async function loadLanguage(lang) {
    const res = await fetch(`/assets/lang/${lang}.json`);
    LANG = await res.json();

    CURRENT_LANG = lang;
    localStorage.setItem("lang", lang);

    applyLanguage();
}

function t(key) {
    return LANG[key] || key;
}

function applyLanguage() {
    document.querySelectorAll("[data-lang]").forEach(el => {
        const key = el.getAttribute("data-lang");
        el.innerText = t(key);
    });

    document.querySelectorAll("[data-lang-placeholder]").forEach(el => {
        const key = el.getAttribute("data-lang-placeholder");
        el.placeholder = t(key);
    });
}

document.addEventListener("DOMContentLoaded", () => {
    loadLanguage(CURRENT_LANG);
});
