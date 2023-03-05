import collect from "collect.js";

export default () => {
    return {
        field: {title : 'Add Item',},
        detail: [],
        index: 0,
        values: {},
        init() {

        },
        setup(detail) {

            if (typeof detail.callback === "function") {
                this.detail = detail;
            }
            this.field = detail.repeater;
            console.log(this.field);

            // if this.field.fields is empty then display a message
            if (this.field.fields.length === 0) {
                alert('No fields found for this repeater');
                return;
            }
            
            // if index is set, then we are editing an item
            if (detail.index !== undefined) {
                this.index = detail.index;
                this.values = this.field.values[this.index].value;
                this.field.fields.forEach((field) => {
                    field.value = this.values[field.key];
                });
            } else {
                this.field.fields.forEach((field) => {
                    field.value = '';
                });
            }
            this.$refs.drawer.show();

        },
        updateRepeaterValue() {

            let fieldValues = collect(this.field.fields).keyBy(item => item.key).map((field) => {
                return field.value;
            });

            this.detail.callback(fieldValues.items, this.index);
            this.detail = [];
            this.field = {title : 'Add Item',};
            this.index = 0;
            this.values = {};
        },
    };
};
