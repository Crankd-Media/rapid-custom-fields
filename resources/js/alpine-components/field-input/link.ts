
export default (intValue = null) => ({
    field: intValue,
    init() {


        if (this.field.value.show === undefined) {
            this.field.value = {
                label: this.field.title,
                // type: 'internal',
                show: false,
                url: null,
                title: null,
            };
        }

    },
});
