import collect from "collect.js";

export default (initFieldTypes) => {
    return {
        field: {title : 'Add Item',},
        fieldTypes:  initFieldTypes,
        detail: [],
        index: 0,
        values: {},
        init() {

        },
        setup(detail) {
            console.log(detail);
            
            if (typeof detail.callback === "function") {
                this.detail = detail;
            }
            this.field = detail.repeater;
            

        
            // if index is set, then we are editing an item
            if (detail.index) {
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

            console.log(this.field.fields);

            // create array of values key bu each field key 
            // and pass it to the callback
            // let fieldValues = collect(this.field.fields).map((field) => {
            //     return field.value;
            // });

            let fieldValues = collect(this.field.fields).keyBy(item => item.key).map((field) => {
                return field.value;
            });



            console.log(fieldValues);
        
            this.detail.callback(fieldValues.items, this.index);
            this.detail = [];
            this.field = {title : 'Add Item',};
            this.index = 0;
            this.values = {};
        },
    };
};
