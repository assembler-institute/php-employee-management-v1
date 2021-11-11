<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php
require_once("../assets/html/header.html");
?>
<div id="jsGrid"></div>
<script>
    window.db = {};

    db.countries = [{
            Name: "",
            Id: 0
        },
        {
            Name: "United States",
            Id: 1
        },
        {
            Name: "Canada",
            Id: 2
        },
        {
            Name: "United Kingdom",
            Id: 3
        },
        {
            Name: "France",
            Id: 4
        },
        {
            Name: "Brazil",
            Id: 5
        },
        {
            Name: "China",
            Id: 6
        },
        {
            Name: "Russia",
            Id: 7
        }
    ];

    db.clients = [{
            "Name": "Otto Clay",
            "Age": 61,
            "Country": 6,
            "Address": "Ap #897-1459 Quam Avenue",
            "Married": false
        },
        {
            "Name": "Connor Johnston",
            "Age": 73,
            "Country": 7,
            "Address": "Ap #370-4647 Dis Av.",
            "Married": false
        },
        {
            "Name": "Lacey Hess",
            "Age": 29,
            "Country": 7,
            "Address": "Ap #365-8835 Integer St.",
            "Married": false
        },
        {
            "Name": "Timothy Henson",
            "Age": 78,
            "Country": 1,
            "Address": "911-5143 Luctus Ave",
            "Married": false
        },
        {
            "Name": "Ramona Benton",
            "Age": 43,
            "Country": 5,
            "Address": "Ap #614-689 Vehicula Street",
            "Married": true
        },
        {
            "Name": "Ezra Tillman",
            "Age": 51,
            "Country": 1,
            "Address": "P.O. Box 738, 7583 Quisque St.",
            "Married": true
        },
        {
            "Name": "Dante Carter",
            "Age": 59,
            "Country": 1,
            "Address": "P.O. Box 976, 6316 Lorem, St.",
            "Married": false
        },
        {
            "Name": "Christopher Mcclure",
            "Age": 58,
            "Country": 1,
            "Address": "847-4303 Dictum Av.",
            "Married": true
        },
        {
            "Name": "Ruby Rocha",
            "Age": 62,
            "Country": 2,
            "Address": "5212 Sagittis Ave",
            "Married": false
        },
        {
            "Name": "Imelda Hardin",
            "Age": 39,
            "Country": 5,
            "Address": "719-7009 Auctor Av.",
            "Married": false
        },
        {
            "Name": "Jonah Johns",
            "Age": 28,
            "Country": 5,
            "Address": "P.O. Box 939, 9310 A Ave",
            "Married": false
        },
        {
            "Name": "Herman Rosa",
            "Age": 49,
            "Country": 7,
            "Address": "718-7162 Molestie Av.",
            "Married": true
        },
        {
            "Name": "Arthur Gay",
            "Age": 20,
            "Country": 7,
            "Address": "5497 Neque Street",
            "Married": false
        },
        {
            "Name": "Xena Wilkerson",
            "Age": 63,
            "Country": 1,
            "Address": "Ap #303-6974 Proin Street",
            "Married": true
        },
        {
            "Name": "Lilah Atkins",
            "Age": 33,
            "Country": 5,
            "Address": "622-8602 Gravida Ave",
            "Married": true
        },
        {
            "Name": "Malik Shepard",
            "Age": 59,
            "Country": 1,
            "Address": "967-5176 Tincidunt Av.",
            "Married": false
        },
        {
            "Name": "Keely Silva",
            "Age": 24,
            "Country": 1,
            "Address": "P.O. Box 153, 8995 Praesent Ave",
            "Married": false
        },
        {
            "Name": "Hunter Pate",
            "Age": 73,
            "Country": 7,
            "Address": "P.O. Box 771, 7599 Ante, Road",
            "Married": false
        },
        {
            "Name": "Mikayla Roach",
            "Age": 55,
            "Country": 5,
            "Address": "Ap #438-9886 Donec Rd.",
            "Married": true
        },
        {
            "Name": "Upton Joseph",
            "Age": 48,
            "Country": 4,
            "Address": "Ap #896-7592 Habitant St.",
            "Married": true
        },
        {
            "Name": "Jeanette Pate",
            "Age": 59,
            "Country": 2,
            "Address": "P.O. Box 177, 7584 Amet, St.",
            "Married": false
        }
    ];

    jsGrid.loadStrategies.PageLoadingStrategy.prototype.sort = function() {
        this._grid._sortData();
        this._grid.refresh();
        return $.Deferred().resolve().promise();
    }

    $("#jsGrid").jsGrid({
        height: "300px",
        width: "100%",

        autoload: true,
        paging: true,
        pageLoading: true,
        filtering: true,
        sorting: true,
        pageSize: 15,
        pageIndex: 2,

        controller: {
            loadData: function(filter) {
                console.log(filter);
                var startIndex = (filter.pageIndex - 1) * filter.pageSize;
                return {
                    data: db.clients.slice(startIndex, startIndex + filter.pageSize),
                    itemsCount: db.clients.length
                };
            }
        },

        fields: [{
                name: "Name",
                type: "text",
                width: 150
            },
            {
                name: "Age",
                type: "number",
                width: 50
            },
            {
                name: "Address",
                type: "text",
                width: 200
            },
            {
                name: "Country",
                type: "select",
                items: db.countries,
                valueField: "Id",
                textField: "Name"
            },
            {
                name: "Married",
                type: "checkbox",
                title: "Is Married"
            }
        ]
    });
</script>
<?php
require_once("../assets/html/footer.html");
?>