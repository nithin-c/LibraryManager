Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({

    el: '#CirculationVue',

    data: {
        items: [],
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        offset: 4,
        formErrors: {},
        formErrorsUpdate: {},
        newItem: {
            'name': ''
        },
        fillItem: {
            'name': '',
            'id': ''
        }
    },

    computed: {
        isActived: function() {
            return this.pagination.current_page;
        },
        pagesNumber: function() {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },

    ready: function() {
        this.getVueItems(this.pagination.current_page);
    },

    methods: {

        getVueItems: function(page) {
            this.$http.get('/Datatable/Circulation?page=' + page).then((response) => {
                this.$set('items', response.data.data.data);

                this.$set('pagination', response.data.pagination);
            });
        },

        addItem: function() {

            $("#issueBook").modal('show');
        },

        createItem: function() {
            var input = this.newItem;

            this.$http.post('/Circulation', input).then((response) => {

                this.newItem = {
                    'name': ''
                };
                $("#issueBook").modal('hide');
                toastr.success('Book Issued Successfully.', 'Success Alert', {
                    timeOut: 5000
                });
            }, (response) => {
                this.formErrors = response.data;
            });
        },

        deleteItem: function(item) {

            this.$http.delete('/Category/' + item.id).then((response) => {
                this.changePage(this.pagination.current_page);
                toastr.success('Item Deleted Successfully.', 'Success Alert', {
                    timeOut: 5000
                });
            });
        },

        editItem: function(item) {
            this.fillItem.name = item.name;
            this.fillItem.id = item.id;

            $("#editCategory").modal('show');
        },

        updateItem: function(id) {
            var input = this.fillItem;
            this.$http.put('/Category/' + id, input).then((response) => {
                this.changePage(this.pagination.current_page);
                this.fillItem = {
                    'name': '',

                    'id': ''
                };
                $("#editCategory").modal('hide');
                toastr.success('Item Updated Successfully.', 'Success Alert', {
                    timeOut: 5000
                });
            }, (response) => {
                this.formErrorsUpdate = response.data;
            });
        },

        changePage: function(page) {
            this.pagination.current_page = page;
            this.getVueItems(page);
        },
        listBooks: function(item) {
            window.location.href = '/Category/' + item.id;
        }

    }

});
