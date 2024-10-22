<!doctype html>
<html lang="en">
<head>
    @include("theme.partials.head")
</head>
<body>
    @include("theme.partials.header")

        @yield('content')

    @include("theme.partials.footer")
    @include("theme.partials.scripts")
    <script>
        function confirmDelete(id) {
            if(confirm('Are you sure?'))
            {
                document.getElementById('deleteForm-' + id).submit();
            }
        }
    </script>
</body>
</html>
