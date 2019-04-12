function loadUser() {
    var template = $('#template').html();
    Mustache.parse(template);   // optional, speeds up future uses
    var json = { "treatment" : [
                    { "name" : "bipolar",
                        "step1" : "Eat beans",
                        "step2" : "Eat More Beans"}
                    ]
                };
    var rendered = Mustache.render(template, json);
    $('#target').html(rendered);
}