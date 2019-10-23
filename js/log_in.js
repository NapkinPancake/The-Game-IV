if (username.value.length == 0) {
    $("#lvl").prop({ disabled: true })
    $("#try1").prop({ disabled: true })
    $("#pushOne").prop({ disabled: true })
} else if (username.value.length > 0) {
    $("#lvl").prop({ disabled: false })
    $("#try1").prop({ disabled: false })
    $("#pushOne").prop({ disabled: false })
} else {
}