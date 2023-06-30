const lightIcon = document.querySelector(".sun");
const darkIcon = document.querySelector(".moon");

const userTheme = localStorage.getItem("theme");
const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;

const iconToggleButton = () =>
{
    lightIcon.classList.toggle("display-none");
    darkIcon.classList.toggle("display-none");
}

const themeChecker = () =>
{
    if (userTheme === "dark" || (!userTheme && systemTheme))
    {
        document.documentElement.classList.add("dark");
        darkIcon.classList.add("display-none");
        return;
    }
    lightIcon.classList.add("display-none");
}

const themeSwitcher = () =>
{
    if (document.documentElement.classList.contains("dark"))
    {
        document.documentElement.classList.remove("dark");
        localStorage.setItem("theme", "light");
        iconToggleButton();
        return;
    }
    document.documentElement.classList.add("dark");
    localStorage.setItem("theme", "dark");
    iconToggleButton();
}

lightIcon.addEventListener("click", () =>
{
    themeSwitcher();
});

darkIcon.addEventListener("click", () =>
{
    themeSwitcher();
});

themeChecker();
