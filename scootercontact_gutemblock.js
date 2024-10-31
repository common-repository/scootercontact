wp.blocks.registerBlockType( 'scootercontact/block', {
    title: 'Formulaire de contact .: SCOOTER :.',
    icon: 'email',
    category: 'widgets',
    edit: function() {
        return wp.element.createElement(
            wp.element.RawHTML,
            null,
            '[scootercontact]'
        );
    },
    save: function() {
        return wp.element.createElement(
            wp.element.RawHTML,
            null,
            '[scootercontact]'
        );
    },
	
	
} );