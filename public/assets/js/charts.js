var amChartsChartsDemo=function() {
    return {
        init:function() {
            AmCharts.makeChart("m_amcharts_1", {
                type:"serial", theme:"light", dataProvider:[ {
                    week: "01/01/2019", visits: 2025
                }, {
                    week: "08/01/2019", visits: 1882
                }, {
                    week: "15/01/2019", visits: 1809
                }, {
                    week: "22/01/2019", visits: 1322
                }, {
                    week: "29/01/2019", visits: 1122
                }, {
                    week: "05/02/2019", visits: 1114
                }, {
                    week: "12/02/2019", visits: 984
                }, {
                    week: "19/02/2019", visits: 1120
                }, {
                    week: "26/02/2019", visits: 2076
                }, {
                    week: "05/03/2019", visits: 1932
                }, {
                    week: "12/03/2019", visits: 1654
                }, {
                    week: "19/03/2019", visits: 1300
                }, {
                    week: "26/03/2019", visits: 2000
                }
                ], valueAxes:[ {
                    gridColor: "#FFFFFF", gridAlpha: .2, dashLength: 0
                }
                ], gridAboveGraphs:!0, startDuration:1, graphs:[ {
                    balloonText: "[[category]]: <b>[[value]]</b>", fillAlphas: .8, lineAlpha: .2, type: "column", valueField: "visits"
                }
                ], chartCursor: {
                    categoryBalloonEnabled: !1, cursorAlpha: 0, zoomable: !1
                }, categoryField:"week", categoryAxis: {
                    gridPosition: "start", gridAlpha: 0, tickPosition: "start", tickLength: 20
                }, export: {
                    enabled: !0
                }
            }
            ),
			AmCharts.makeChart("m_amcharts_2", {
                type:"serial", theme:"light", dataProvider:[ {
                    week: "01/01/2019", visits: 2025
                }
                , {
                    week: "08/01/2019", visits: 1882
                }
                , {
                    week: "15/01/2019", visits: 1809
                }
                , {
                    week: "22/01/2019", visits: 1322
                }
                , {
                    week: "29/01/2019", visits: 1122
                }
                , {
                    week: "05/02/2019", visits: 1114
                }
                , {
                    week: "12/02/2019", visits: 984
                }
                , {
                    week: "19/02/2019", visits: 1120
                }
                , {
                    week: "26/02/2019", visits: 2076
                }
                , {
                    week: "05/03/2019", visits: 1932
                }
                , {
                    week: "12/03/2019", visits: 1654
                }
                , {
                    week: "19/03/2019", visits: 1300
                }
                , {
                    week: "26/03/2019", visits: 2000
                }
                ], valueAxes:[ {
                    gridColor: "#FFFFFF", gridAlpha: .2, dashLength: 0
                }
                ], gridAboveGraphs:!0, startDuration:1, graphs:[ {
                    balloonText: "[[category]]: <b>[[value]]</b>", fillAlphas: .8, lineAlpha: .2, type: "column", valueField: "visits"
                }
                ], chartCursor: {
                    categoryBalloonEnabled: !1, cursorAlpha: 0, zoomable: !1
                }
                , categoryField:"week", categoryAxis: {
                    gridPosition: "start", gridAlpha: 0, tickPosition: "start", tickLength: 20
                }
                , export: {
                    enabled: !0
                }
            }	
			),
            e()
        }
    }
}

();
jQuery(document).ready(function() {
    amChartsChartsDemo.init()
}

);