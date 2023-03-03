
export default (intValue = null) => ({
    repeater: intValue,
    init() {

    },
    addValue(value) {
        if (this.repeater.values === undefined) { 
            this.repeater.values = [];
        }
        this.repeater.values.push({ value: value });
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
