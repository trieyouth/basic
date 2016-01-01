/**
 * Created by youth on 15-12-17.
 */

var isFirst = true;
var isExpand = false;


$("#base_menu").click(
    function () {
        if (isFirst) {
            isFirst = false;
            isExpand = window.screen.width >= 768;
        }
        if (isExpand == false) {
            isExpand = true;
            if (window.screen.width >= 768) {
                $('#sidebar').animate(
                    {width: 250}, 500, 0, function () {
                        var search_input = document.getElementById("search-input");
                        search_input.placeholder = "Search";
                    }
                );
                $('#content').animate(
                    {paddingLeft: 250}, 500
                );
            } else {
                $('#sidebar').animate(
                    {width: 80}, 500, 0, function () {
                       var search_input = document.getElementById("search-input");
                        search_input.placeholder = "";
                    }
                );
                $('#content').animate(
                    {paddingLeft: 80}, 500
                );
            }

        } else {
            isExpand = false;
            if (window.screen.width >= 768) {
                $('#sidebar').animate(
                    {width: 80}, 500, 0, function () {
                        var search_input = document.getElementById("search-input");
                        search_input.placeholder = "";
                    }
                );
                $('#content').animate(
                    {paddingLeft: 80}, 500
                );
            } else {
                $('#sidebar').animate(
                    {width: 0}, 500, 0, function () {
                        var search_input = document.getElementById("search-input");
                        search_input.placeholder = "";
                    }
                );
                $('#content').animate(
                    {paddingLeft: 0}, 500
                );
            }
        }
    }
);


