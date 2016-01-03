/**
 * Created by youth on 16-1-1.
 */
function deleteDish(id) {
    if (confirm("你确定删除吗？")) {
        $.post("http://localhost/basic/web/index.php?r=dish/del",
            {
                'id': id
            }
        );
    }
}

function showUpdate(id) {
    $("#"+id).slideToggle("slow");
}
