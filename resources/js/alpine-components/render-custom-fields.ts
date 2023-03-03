import Sortable from 'sortablejs';

export default (initRoute, initFields, initFieldTypes) => {
    return {
        route: initRoute,
        fields: initFields,
        fieldTypes: initFieldTypes,
        init() {
            let object = this;
            Sortable.create(this.$refs.sortableFields, {
                sort: true,
                draggable: ".line-item",
                handle: ".drag-icon",
                animation: 150,
                onEnd: function (/**Event*/ event) {
                    object.updateLineOrder(event.oldIndex, event.newIndex);
                },
            });

            // watch if fields change
            this.$watch("fields", () => {
                this.save();
            });
        },
        addField() {
            this.fields.push({
                title: "new",
                key: "new",
                type: "text",
                order: this.fields.length + 1,
                options: [],
            });
        },
        remove(index) {
        
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                reverseButtons: true,
                showCancelButton: true,
                confirmButtonText: SweetalertOptions.confirmButtonText,
                confirmButtonColor: SweetalertOptions.confirmButtonColor,
                cancelButtonColor: SweetalertOptions.cancelButtonColor,
                customClass: {
                    confirmButton: SweetalertOptions.confirmButtonClass,
                    cancelButton: SweetalertOptions.cancelButtonClass,
                },
            }).then((result) => {
                if (result.value) {
                    this.fields.splice(index, 1);
                }
            });

        },
        updateLineOrder(oldIndex, newIndex) {
            // V3 helper to unwrap the proxy
            let fields = Alpine.raw(this.fields);
            // splice mutates the original object, which
            // you want to avoid. In this case it works because we
            // created a temporary object that we can control
            // That way we know there are no side effects
            let moved_field = fields.splice(oldIndex, 1)[0];
            fields.splice(newIndex, 0, moved_field);
            // save the model
            this.save();
        },
        save() {
            axios
            .patch(this.route, {
                custom_fields: this.fields,
            })
            .then((response) => {
            })
            .catch((error) => {
                // console.log(error);
            });
        },
    };
};
