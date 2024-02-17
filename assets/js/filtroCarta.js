    const PRODCATEGORIASID = [];
    const CATEGORIASID = [];

    document.addEventListener("DOMContentLoaded", function () {
        var checkboxes = document.querySelectorAll('input[name="categorias[]"]');

        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                // Filtra las categorías seleccionadas
                var categoriasSeleccionadas = Array.from(checkboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value);

                // Oculta todas las categorías
                ocultarTodasCategorias();

                // Muestra solo las categorías seleccionadas
                categoriasSeleccionadas.forEach(function (categoriaId) {
                    CATEGORIASID[categoriaId].classList.remove('filtroNoSelected');
                    PRODCATEGORIASID[categoriaId].classList.remove('filtroNoSelected');
                });

                // Verifica si ningún checkbox está seleccionado y muestra todas las categorías
                if (ningunCheckboxSeleccionado()) {
                    mostrarTodasCategorias();
                }
            });
        });

        // Función para verificar si ningún checkbox está seleccionado
        function ningunCheckboxSeleccionado() {
            return !Array.from(checkboxes).some(checkbox => checkbox.checked);
        }

        // Función para mostrar todas las categorías
        function mostrarTodasCategorias() {
            for (let i = 1; i <= 6; i++) {
                CATEGORIASID[i].classList.remove('filtroNoSelected');
                PRODCATEGORIASID[i].classList.remove('filtroNoSelected');
            }
        }

        // Función para ocultar todas las categorías
        function ocultarTodasCategorias() {
            for (let i = 1; i <= 6; i++) {
                CATEGORIASID[i].classList.add('filtroNoSelected');
                PRODCATEGORIASID[i].classList.add('filtroNoSelected');
            }
        }


        for (let i = 1; i <= 6; i++) {
            CATEGORIASID[i] = document.getElementById('cartaCatName' + i);
            PRODCATEGORIASID[i] = document.getElementById('cartaProdCat' + i);
        }

        console.log(CATEGORIASID);

        // Muestra todas las categorías al cargar la página
        mostrarTodasCategorias();
    });
