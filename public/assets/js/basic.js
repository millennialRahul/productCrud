var DatatablesBasicBasic= {
    init:function() {
        var e;
        (e=$("#m_table_1")).DataTable( {
            responsive:!0, "paging":   false, "ordering": false, dom:"<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>"
            , order:[[4, "asc"]], headerCallback:function(e, a, t, n, s) {
                e.getElementsByTagName("th")[8].innerHTML=''
            }
            , columnDefs:[ {
                targets:4, title:"Actions", orderable:!1, render:function(e, a, t, n) {
                    return'\n            <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">\n                          <i class="la la-comments"></i>\n                        </a>\n            <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">\n                          <i class="la la-archive"></i>\n                        </a>'
                }
            }
            ]
        }
        )
    }
}

;
jQuery(document).ready(function() {
    DatatablesBasicBasic.init()
}

);