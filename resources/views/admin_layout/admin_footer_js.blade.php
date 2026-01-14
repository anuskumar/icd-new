<!-- jQuery -->
<script src="{{ asset('admin_assets/assets/js/jquery-3.6.0.min.js') }}"></script>

<!-- Feather Icon JS -->
<script src="{{ asset('admin_assets/assets/js/feather.min.js') }}"></script>

<!-- Slimscroll JS -->
<script src="{{ asset('admin_assets/assets/js/jquery.slimscroll.min.js') }}"></script>

<!-- Datatable JS -->
<script src="{{ asset('admin_assets/assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_assets/assets/js/dataTables.bootstrap4.min.js') }}"></script>


<!-- Select2 JS -->
<script src="{{ asset('admin_assets/assets/plugins/select2/js/select2.min.js') }}"></script>

<!-- Datetimepicker JS -->
<script src="{{ asset('admin_assets/assets/js/moment.min.js') }}"></script>
<script src="{{ asset('admin_assets/assets/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Fileupload JS -->
<script src="{{ asset('admin_assets/assets/plugins/fileupload/fileupload.min.js') }}"></script>

<!-- Sweetalert 2 -->
<script src="{{ asset('admin_assets/assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('admin_assets/assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>

<!-- Mask JS -->
<script src="{{ asset('admin_assets/assets/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('admin_assets/assets/plugins/toastr/toastr.js') }}"></script>


<!-- Chart JS -->
<script src="{{ asset('admin_assets/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin_assets/assets/plugins/apexchart/chart-data.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('admin_assets/assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- Summernote JS -->
<script src="{{ asset('admin_assets/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('admin_assets/assets/js/script.js') }}"></script>

<script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>

<!-- Wizard JS -->
<script src="{{ asset('admin_assets/assets/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}">
</script>
<script src="{{ asset('admin_assets/assets/plugins/twitter-bootstrap-wizard/prettify.js') }}"></script>
<script src="{{ asset('admin_assets/assets/plugins/twitter-bootstrap-wizard/form-wizard.js') }}"></script>


<script>
    const editorConfig = {
        extraPlugins: 'colorbutton,colordialog,tabletools',
        toolbar: [{
                name: 'document',
                items: ['Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates']
            },
            {
                name: 'clipboard',
                items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
            },
            {
                name: 'editing',
                items: ['Find', 'Replace', '-', 'SelectAll', '-', 'SpellChecker', 'Scayt']
            },
            {
                name: 'forms',
                items: ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton',
                    'HiddenField'
                ]
            },
            '/',
            {
                name: 'basicstyles',
                items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-',
                    'RemoveFormat'
                ]
            },
            {
                name: 'paragraph',
                items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote',
                    'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-',
                    'BidiLtr', 'BidiRtl', 'Language'
                ]
            },
            {
                name: 'links',
                items: ['Link', 'Unlink', 'Anchor']
            },
            {
                name: 'insert',
                items: ['Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe']
            },
            '/',
            {
                name: 'styles',
                items: ['Styles', 'Format', 'Font', 'FontSize']
            },
            {
                name: 'colors',
                items: ['TextColor', 'BGColor']
            },
            {
                name: 'tools',
                items: ['Maximize', 'ShowBlocks']
            },
            {
                name: 'about',
                items: ['About']
            },
            {
                name: 'table',
                items: ['Table', 'TableCellProperties']
            } // Add TableCellProperties to the toolbar
        ],
        stylesSet: [{
                name: 'Off-White Div',
                element: 'div',
                attributes: {
                    'class': 'off-white-div'
                },
                styles: {
                    'background-color': '#f8f9fa',
                    'padding': '10px',
                    'border': '1px solid #dedede',
                    'border-radius': '5px'
                }
            },
            {
                name: 'Blue Div',
                element: 'div',
                attributes: {
                    'class': 'blue-div'
                },
                styles: {
                    'background-color': '#cce5ff',
                    'padding': '10px',
                    'border': '1px solid #339af0',
                    'border-radius': '5px'
                }
            },
            {
                name: 'Green Div',
                element: 'div',
                attributes: {
                    'class': 'green-div'
                },
                styles: {
                    'background-color': '#d4edda',
                    'padding': '10px',
                    'border': '1px solid #28a745',
                    'border-radius': '5px'
                }
            },
            {
                name: 'Yellow Div',
                element: 'div',
                attributes: {
                    'class': 'yellow-div'
                },
                styles: {
                    'background-color': '#fff3cd',
                    'padding': '10px',
                    'border': '1px solid #ffc107',
                    'border-radius': '5px'
                }
            },
            {
                name: 'Purple Div',
                element: 'div',
                attributes: {
                    'class': 'purple-div'
                },
                styles: {
                    'background-color': '#e8daef',
                    'padding': '10px',
                    'border': '1px solid #6f42c1',
                    'border-radius': '5px'
                }
            },
            {
                name: 'Custom Table',
                element: 'table',
                attributes: {
                    'class': 'custom-table table-responsive'
                },
                styles: {
                    'border': '1px solid #ccc',
                    'border-collapse': 'collapse',
                    'width': '100%',
                    'border-radius': '5px',
                    'background-color': '#f8f9fa'
                }
            },
            {
                name: 'Centered Table',
                element: 'table',
                attributes: {
                    'class': 'centered-table table-responsive'
                },
                styles: {
                    'margin': '0 auto',
                    'border': '1px solid #000000',
                    'border-collapse': 'collapse',
                    'width': '80%',
                    'border-radius': '5px',
                    'background-color': '#f8f9fa'
                }
            },
            {
                name: 'Table Cell',
                element: 'td',
                attributes: {
                    'class': 'table-cell'
                },
                styles: {
                    'border': '1px solid #000000',
                    'padding': '10px',
                    'padding-left': '30px',
                    'text-align': 'left'
                }
            }
        ]
    };

    // Initialize CKEditor only for existing elements
    const editorElements = ['editor', 'admission_editor', 'syllabus_editor'];

    editorElements.forEach(elementId => {
        if (document.getElementById(elementId)) {
            CKEDITOR.replace(elementId, editorConfig);
        }
    });

    // Remove CKEditor outdated version warning
    CKEDITOR.on('instanceReady', function() {
        setTimeout(() => {
            const notifications = document.querySelectorAll('.cke_notifications_area');
            notifications.forEach(notification => {
                notification.remove();
            });
        }, 100);
    });
</script>
