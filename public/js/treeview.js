$(document).mouseup(function (e) {
    if (!$(".tree-menu").is(e.target) && $(".tree-menu").has(e.target).length === 0) {
        $(".tree-menu").removeClass("is-active");
    }
});

$(document).on("click", ".input-search", function () {
    $(".tree").find("ul").hide();
    $(".tree-menu").removeClass("no-active");
    $(".tree-menu").addClass("is-active");
});

$(document).on("click", "#treeview .indicator", function () {
    var selectULClass = $(this).next("ul").attr("class");
    var selectUL = $(this).next("ul");
    var parentUL = $(this).parent().parent().find("ul");

    $(".tree-menu ul > li").each(function () {
        if ($(this).find("ul").attr("class") == "is-active") {
            parentUL.hide();
            parentUL.removeClass("is-active");
        }
    });

    if (selectULClass == undefined || selectULClass == "") {
        selectUL.toggle();
        selectUL.find("li").show();
        selectUL.addClass("is-active");
    }
});

$(document).on("click", "#treeview input[type=checkbox]", function () {
    if ($(this).is(":checked")) {
        $(this).parent().parent().prev().prev().prev().prop("checked", false);
        $(this).parent().parent().prev().prev().removeClass("selectedClass");

        $(this).next().prop("checked", false);
        $(this).next().next().next().next("ul").find(".input-show").prop("checked", true);
        $(this).next().next().next().next("ul").find(".input-hidden").prop("checked", false);
        $(this).parent().find("a").removeClass("selectedClass");
        $(this).parent().find("ul").addClass("is-active");
    } else {
        $(this).next().next().next().next("ul").find(".input-show").prop("checked", false);
        //$(this).next().next().next("ul").addClass("no-active");
    }
});

$(document).on("click", "#treeview a", function () {
    if ($(this).attr("class") == "selectedClass" || $(this).attr("class") == "group selectedClass") {
        $(this).prev().prop("checked", false);
        $(this).removeClass("selectedClass");
    } else {
        $(this).prev().prop("checked", true);
        $(this).prev().prev().prop("checked", false);
        $(this).parent().find(".input-show").prop("checked", false);
        $(this).addClass("selectedClass");
    }
});

$(document).on("keyup", "#treeview .input-search", function () {
    var searchText = $(this).val().toUpperCase();
    var showItem;

    if (searchText == "") {
        $(".tree-menu").find("li").show();
        $(".tree-menu .tree").find("ul").hide();
        $(".tree-menu .tree").find("ul").removeClass("is-active");
    } else {
        $(".tree-menu ul > li").each(function () {
            var currentLiText = $(this).text().toUpperCase(),
                    showCurrentLi = currentLiText.indexOf(searchText) !== -1;
            $(this).toggle(showCurrentLi);
            if (showCurrentLi) {
                $(this).find("ul").show();
                $(this).find("ul").addClass("is-active");
                showItem = $(this).find("li");
            } else {
                $(this).find("ul").removeClass("is-active");
            }
        });
        showItem.show();
    }
});
