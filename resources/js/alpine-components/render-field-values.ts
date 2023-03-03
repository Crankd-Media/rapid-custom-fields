export default (initFields = null, initOldFields = null, initRoute = '') => ({
    fields: initFields,
    oldFields : initOldFields,
    route: initRoute,
    init() {

    },
    save() {
        axios
            .patch(this.route, {
                custom_field_values: this.fields,
            })
            .then((response) => {
            })
            .catch((error) => {
                // console.log(error);
            });
    },
    discardChanges() {
        this.fields = this.oldFields;
    }
});
