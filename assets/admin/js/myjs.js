new DataTable('#dataTable', {
    layout: {
        topStart: {
            buttons: [
                {
                    extend: 'createState',
                    config: {
                        creationModal: true,
                        toggle: {
                            columns: {
                                search: true,
                                visible: true
                            },
                            length: true,
                            order: true,
                            paging: true,
                            search: true
                        }
                    }
                },
                'savedStates'
            ]
        }
    }
});