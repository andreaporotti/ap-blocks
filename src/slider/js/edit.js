/**
 * WordPress components that create the necessary UI elements for the block
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-components/
 */
import { PanelBody, RangeControl, CheckboxControl, TextControl } from '@wordpress/components';

/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, useInnerBlocksProps, InspectorControls } from '@wordpress/block-editor';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import '../css/editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit( { attributes, setAttributes, isSelected } ) {
	const blockProps = useBlockProps( { className: 'grid grid-cols-4 gap-2' } );
	const innerBlocksProps = useInnerBlocksProps( blockProps, { allowedBlocks: [ 'ap-blocks/slide' ], orientation: 'horizontal' } );

	return (
		<>
			<InspectorControls>
				<PanelBody
					title={ __( 'Settings', 'ap-blocks' ) }
					initialOpen={ true }
				>
					<RangeControl
						label={ __( 'Slides per view', 'ap-blocks' ) }
						initialPosition={ attributes.slidesPerView }
						max={6}
						min={1}
						onChange={ ( value ) => { setAttributes( { slidesPerView: value } ) } }
					/>

					<TextControl
						label={ __( 'Space between slides', 'ap-blocks' ) }
						help={ __( 'Insert a number of pixels', 'ap-blocks' ) }
						onChange={ ( value ) => { setAttributes( { spaceBetween: parseInt(value) } ) } }
						value={ attributes.spaceBetween }
					/>

					<CheckboxControl
						label={ __( 'Loop', 'ap-blocks' ) }
						checked={ attributes.loop }
						onChange={ ( checked ) => { setAttributes( { loop: checked } ) } }
					/>

					<CheckboxControl
						label={ __( 'Pagination', 'ap-blocks' ) }
						checked={ attributes.pagination }
						onChange={ ( checked ) => { setAttributes( { pagination: checked } ) } }
					/>

					<CheckboxControl
						label={ __( 'Navigation', 'ap-blocks' ) }
						checked={ attributes.navigation }
						onChange={ ( checked ) => { setAttributes( { navigation: checked } ) } }
					/>
				</PanelBody>
			</InspectorControls>

			<div {...innerBlocksProps} />
		</>
	);
}
