/**
 * Created by youth on 15-12-17.
 */

var isFirst = true;
var isExpand = false;

$("#sidebar-collapse").click(
    function () {
        if (isFirst) {
            isFirst = false;
            isExpand = window.screen.width >= 768;
        }
        if (isExpand == false) {
            isExpand = true;
            $('#sidebar').animate(
                {width:250},500,0,function(){
                    var search_input = document.getElementById("search-input");
                    search_input.placeholder = "Search";
                }
            );
        } else {
            isExpand = false;
            $('#sidebar').animate(
                {width:50},500,0,function(){
                    var search_input = document.getElementById("search-input");
                    search_input.placeholder = "";
                    var menu_item_font = document.getElementsByName("");
                }
            );
            $('#content').animate(

            );
        }
    }
);


