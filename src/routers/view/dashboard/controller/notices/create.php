<?php include('src/includes/master/Header.include.php'); ?>

<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="font-weight-bolder">Product Image</h5>
                    <div class="row">
                        <div class="col-12">
                            <img class="w-100 border-radius-lg shadow-lg mt-3" src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80" alt="product_image">
                        </div>
                        <div class="col-12 mt-4">
                            <div class="d-flex">
                                <button class="btn bg-gradient-primary btn-sm mb-0 me-2" type="button" name="button">Edit</button>
                                <button class="btn btn-outline-dark btn-sm mb-0" type="button" name="button">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mt-lg-0 mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bolder">Product Information</h5>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Name</label>
                            <input class="form-control" type="text" value="Minimal Bar Stool" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <label>Weight</label>
                            <input class="form-control" type="number" value="2" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label class="mt-4">Collection</label>
                            <input class="form-control" type="text" value="Summer" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        <div class="col-3">
                            <label class="mt-4">Price</label>
                            <input class="form-control" type="text" value="$90" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        <div class="col-3">
                            <label class="mt-4">Quantity</label>
                            <input class="form-control" type="number" value="50" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="mt-4">Description</label>
                            <p class="form-text text-muted text-xs ms-1 d-inline">
                                (optional)
                            </p>
                            <div id="edit-deschiption-edit" class="h-50">
                                Long sleeves black denim jacket with a twisted design. Contrast stitching. Button up closure. White arrow prints on the back.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                var win = navigator.platform.indexOf('Win') > -1;
                if (win && document.querySelector('#sidenav-scrollbar')) {
                    var options = {
                        damping: '0.5'
                    }
                    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
                }
            </script>
            <?php include('src/includes/master/Footer.include.php'); ?>
            <script src="/template/dashboard/assets/js/plugins/choices.min.js"></script>
            <script src="/template/dashboard/assets/js/plugins/quill.min.js"></script>
            <script>
                if (document.getElementById('edit-deschiption-edit')) {
                    var quill = new Quill('#edit-deschiption-edit', {
                        theme: 'snow' // Specify theme in configuration
                    });
                };

                if (document.getElementById('choices-category-edit')) {
                    var element = document.getElementById('choices-category-edit');
                    const example = new Choices(element, {
                        searchEnabled: false
                    });
                };

                if (document.getElementById('choices-color-edit')) {
                    var element = document.getElementById('choices-color-edit');
                    const example = new Choices(element, {
                        searchEnabled: false
                    });
                };

                if (document.getElementById('choices-currency-edit')) {
                    var element = document.getElementById('choices-currency-edit');
                    const example = new Choices(element, {
                        searchEnabled: false
                    });
                };

                if (document.getElementById('choices-tags-edit')) {
                    var tags = document.getElementById('choices-tags-edit');
                    const examples = new Choices(tags, {
                        removeItemButton: true
                    });

                    examples.setChoices(
                        [{
                                value: 'One',
                                label: 'Expired',
                                disabled: true
                            },
                            {
                                value: 'Two',
                                label: 'Out of Stock',
                                selected: true
                            }
                        ],
                        'value',
                        'label',
                        false,
                    );
                }
            </script>
            <script src="/template/dashboard/assets/js/plugins/dragula/dragula.min.js"></script>
            <script src="/template/dashboard/assets/js/plugins/jkanban/jkanban.js"></script>