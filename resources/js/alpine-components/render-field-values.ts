export default (initFields = null, initOldFields = null, initRoute = '') => ({
    fields: initFields,
    oldFields : initOldFields,
    valueChanged: false,
    route: initRoute,
    init() {
        console.log(this.route);
        this.$watch("fields", (value) => {
            if (this.fields != initFields) {
                this.valueChanged = true;
                console.log(value);
            }
        });
    },
    save() {
        this.valueChanged = false;

        console.log(this.fields);

        if (Array.isArray(this.fields)) {
            console.log("array");
            console.log(this.fields);
        } else {
            console.log("object");
            console.log(this.fields);
        }

        
        axios
            .patch(this.route, {
                custom_field_values: this.fields,
            })
            .then((response) => {
                console.log(response);
            })
            .catch((error) => {
                // console.log(error);
            });
    },
    discardChanges() {
        this.fields = this.oldFields;
        this.valueChanged = false;
    }
});
