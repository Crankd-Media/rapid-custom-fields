export default (initFields = null, initOldFields = null) => ({
    fields: initFields,
    oldFields : initOldFields,
    valueChanged: false,
    init() {
        this.$watch("fields", (value) => {
            if (this.fields != initFields) {
                this.valueChanged = true;
            }
        });
    },
    save() {
        this.valueChanged = false;
        console.log('SAVE');
    },
    discardChanges() {
        this.fields = this.oldFields;
        this.valueChanged = false;
    }
});
