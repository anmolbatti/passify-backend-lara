window.addEventListener("load", function () {
    // store tabs variable
    var myTabs = document.querySelectorAll(".nav-tabs .nav");
    function myTabClicks(tabClickEvent) {
        for (var i = 0; i < myTabs.length; i++) {
            myTabs[i].classList.remove("active");
        }
        var clickedTab = tabClickEvent.currentTarget;
        clickedTab.classList.add("active");
        tabClickEvent.preventDefault();
        var myContentPanes = document.querySelectorAll(".tab-pane");
        for (i = 0; i < myContentPanes.length; i++) {
            myContentPanes[i].classList.remove("active");
        }
        var anchorReference = tabClickEvent.target;
        var activePaneId = anchorReference.getAttribute("href");
        if (activePaneId == "#tab-2") {
            toggleView();
        } else {
            toggleViewChange();
        }
        var activePane = document.querySelector(activePaneId);
        activePane.classList.add("active");
    }
    for (i = 0; i < myTabs.length; i++) {
        myTabs[i].addEventListener("click", myTabClicks);
    }
});

const toggleView = () => {
    let detail_page = document.getElementById("detail_page");
    let cofee_temp = document.getElementById("cofee_temp");

    detail_page.style.display = "block";
    cofee_temp.style.display = "none";
};
const toggleViewChange = () => {
    let detail_page = document.getElementById("detail_page");
    let cofee_temp = document.getElementById("cofee_temp");

    detail_page.style.display = "none";
    cofee_temp.style.display = "block";
};
