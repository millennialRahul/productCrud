var DatatablesBasicBasic= {
    init:function() {
        var e;
        (e=$("#shortisted")).DataTable( {
            responsive:!0, dom:"<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", lengthMenu:[5, 10, 25, 50], pageLength:10, language: {
                lengthMenu: "Display _MENU_"
            }
            , order:[[1, "desc"]], headerCallback:function(e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML='\n<label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">\n ' +
                    '<input type="checkbox" value="" class="m-group-checkable">\n <span></span>\n </label>'
            }
            , columnDefs:[ {
                targets:0, width:"30px", className:"dt-right", orderable:!1, render:function(e, a, t, n) {
                    return'\n                        <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">\n ' +
                        '<input type="checkbox" value="'+t[0]+'" class="m-checkable enquiry-id">\n <span></span>\n</label>'
                }
            }
            ]
        }
        ),
        e.on("change", ".m-group-checkable", function() {
            var e=$(this).closest("table").find("td:first-child .m-checkable"), a=$(this).is(":checked");
            $(e).each(function() {
                a?($(this).prop("checked", !0), $(this).closest("tr").addClass("active")): ($(this).prop("checked", !1), $(this).closest("tr").removeClass("active"))
            }
            )
        }
        ),
        e.on("change", "tbody tr .m-checkbox", function() {
            $(this).parents("tr").toggleClass("active")
        }
        )
    }
}

;
jQuery(document).ready(function() {
    DatatablesBasicBasic.init()
}

);
