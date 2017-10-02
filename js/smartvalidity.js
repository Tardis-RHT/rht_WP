jQuery.fn.smartValidity = function(options){
    // настройки по умолчанию
    var options = $.extend({
        startColor: 'rgb(120,120,123)',
        startText: 'Номер телефона',
        startBorder: '#dddddd',
        startstyle:'',

        errorColor: 'red',
        errorText:'Номер должен состоять из 12 цифр',
        errorBorder: 'red',
        errorstyle:'',
        
        // input: 'tel',
        btn: '', //takes only id
        label:'' //takes only id

    },options);

    return this.each(function() {
        var input = $(this);
        var btn = $('#' + options.btn);
        var label = $('#' + options.label);

        function startopt(){
            label.css('color', options.startColor)
                .html(options.startText)
            input.css('border-color', options.startBorder)
        }
        function erroropt(){
            label.css('color', options.errorColor)
                .html(options.errorText)
            input.css('border-color', options.errorBorder),
            input.css(options.errorstyle)
        }

        if (btn !== undefined){
            // btn.prop( "disabled", true );
            this.onfocus = function(){
                startopt();
            }
            this.checkValidity();

            if (this.checkValidity() === false || this.value == ""){
                // console.log('invalid');
                // btn.prop( "disabled", true );
                this.onblur = function(){
                    erroropt();
                } 
            }
            else if (this.checkValidity() === true){
                // console.log('valid');
                // btn.prop( "disabled", false );
                this.onblur = function(){
                    startopt();
                }
            }
        }
    });
};