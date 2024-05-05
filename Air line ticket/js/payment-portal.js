document.getElementById('card_number').addEventListener('input', function(event){
    let value = event.target.value.replace(/\D/g, ''); 
    let formattedValue = '';

    for (let i = 0; i < value.length; i++){
        if(i >= 16){
            break;
        }
        if (i>0 && i%4 == 0){
            formattedValue += '-';
        }
        formattedValue += value[i];
    }

    event.target.value = formattedValue;
});
