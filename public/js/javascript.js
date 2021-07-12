$(function () {
    var html = $('html')


    //pegar o localStorage
    var storedTheme = localStorage.getItem('theme')

    //setar na tag html a classe que esta no localStorage
    html.toggleClass(storedTheme, true)

    var button = $('#theme-toggle');
    button.on('click', function () {
        var isDark = html.attr('class').includes('dark')
        html.toggleClass('dark', !isDark)

        if (isDark) {
            localStorage.setItem('theme', '')
        } else {
            localStorage.setItem('theme', 'dark')
        }
    })

    var input = $('input[value=1]')

    var respostas = $('#respostas')

    var enviar = $('#enviar')

    enviar.hide()

    respostas.on('click', function () {
        if($('input:checked').length == $('.question').length) {
            var correta = input.attr('class').includes('correta')
            input.toggleClass('correta', !correta)
            input.after('<i id="correta" class="text-green-500 object fas fa-check"></i>')
            $('html, body').animate({scrollTop:0}, 'slow');
            respostas.hide()
            enviar.show()
            $('input').attr('disabled', true);
        }
        else {
            $('#span_erro').remove()
            $('#erro').append('<span id="span_erro" class="text-sm text-red-500 text-center p-2">* Todas as questões são de preenchimento obrigatório!</span>')
        }
    })

    enviar.on('click', function () {
        $('input').prop('disabled', false)
    })

    
    if($('option[value=10]')) {
        $('option[value=10]').attr('selected', true)
    }
    
});