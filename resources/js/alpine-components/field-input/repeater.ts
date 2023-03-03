
export default (intValue = null) => ({
    repeater: intValue,
    init() {
        console.log("Repeater int");
        console.log(this.repeater);
        console.log(this.repeater);

        
    },
    addValue(value) {
        console.log("addValue");
        console.log(value);
        if (this.repeater.values === undefined) { 
            this.repeater.values = [];
        }
        this.repeater.values.push({ value: value });
        console.log(this.repeater.values);
    },
    updateValue(value, index) {
        this.repeater.values[index].value = value;
    },
    addItem() {
        window.dispatchEvent(
            new CustomEvent("open-edit-repeater-item", {
                detail: {
                    callback: this.addValue.bind(this),
                    repeater: this.repeater,
                },
            })
        );
    },
    editItem(index) {

        console.log(this.repeater.values[index]);

        window.dispatchEvent(
            new CustomEvent("open-edit-repeater-item", {
                detail: {
                    callback: this.updateValue.bind(this),
                    repeater: this.repeater,
                    index: index,
                },
            })
        );
    },
    removeItem(index) {
        this.repeater.values.splice(index, 1);
    },
});
