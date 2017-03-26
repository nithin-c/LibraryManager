Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({

    el: '#BookVue',

    data: {
        categoryId: categoryId,
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
            'isbn': '',
            'name': '',
            'author': '',
            'publisher': '',
            'count': '',
            'categoryId': categoryId

        },
        fillItem: {
            'isbn': '',
            'name': '',
            'author': '',
            'publisher': '',
            'count': ''
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

            this.$http.get('/Datatable/Book?page=' + page).then((response) => {
                this.$set('items', response.data.data.data);

                this.$set('pagination', response.data.pagination);
            });
        },

        addItem: function() {

            $("#createBook").modal('show');
        },

        createItem: function() {
            var input = this.newItem;

            this.$http.post('/Book', input).then((response) => {

                this.newItem = {
                    'isbn': '',
                    'name': '',
                    'author': '',
                    'publisher': '',
                    'count': ''
                };
                $("#createBook").modal('hide');
                toastr.success('Book Added Successfully.', 'Success Alert', {
                    timeOut: 5000
                });
            }, (response) => {
                this.formErrors = response.data;
            });
        },

        deleteItem: function(item) {

            this.$http.delete('/Book/' + item.id).then((response) => {
                this.changePage(this.pagination.current_page);
                toastr.success('Item Deleted Successfully.', 'Success Alert', {
                    timeOut: 5000
                });
            });
        },

        editItem: function(item) {
            this.fillItem.name = item.name;
            this.fillItem.id = item.id;

            $("#editBook").modal('show');
        },

        updateItem: function(id) {
            var input = this.fillItem;
            this.$http.put('/Book/' + id, input).then((response) => {
                this.changePage(this.pagination.current_page);
                this.fillItem = {
                    'isbn': '',
                    'name': '',
                    'author': '',
                    'publisher': '',
                    'count': '',
                    'id': ''
                };
                $("#editBook").modal('hide');
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
            window.location.href = '/Book/' + item.id;
        }

    }

});
