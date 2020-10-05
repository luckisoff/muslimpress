
    </div>
    <!-- JS, Popper.js, and jQuery -->
    <script>
        window.Laravel = {!!
                json_encode([
                    'csrfToken' => csrf_token(),
                    'baseUrl'   => url('/'),
                    'locale'    => app()->getLocale(),
                    'type'      => $type??'news',
                    'cat_name'  => $cat_name??null,
                    'cat_id'    => $cat_id??null,
                ])
            !!}
    </script>
    <script src="{{asset('js/app.js')}}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    @stack('scripts')
</body>
</html>