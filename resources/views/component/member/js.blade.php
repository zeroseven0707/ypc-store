<script src="{{ asset('js/index.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>
<script>
    document.querySelector('#dec').addEventListener('click', function(){
 document.querySelector('[name=jumlah]').value --;
})

document.querySelector('#inc').addEventListener('click', function(){
 document.querySelector('[name=jumlah]').value ++;
})
</script>