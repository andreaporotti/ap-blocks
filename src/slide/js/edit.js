/**
 * WordPress components that create the necessary UI elements for the block
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-components/
 */
 import { Button } from '@wordpress/components';

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
import { useBlockProps, MediaUploadCheck, MediaPlaceholder } from '@wordpress/block-editor';

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
	const blockProps = useBlockProps();

	return (
		<div { ...blockProps }>
			{ attributes.imageUrl && !isSelected ? (
				// Preview the slide when the block is not selected.
				<img className='!w-full !h-full object-cover aspect-square' src={ attributes.imageUrl } alt={ attributes.imageAlt } />
			) : (
				<>
					{ attributes.imageUrl ? (
						<div className='relative h-full'>
							<img className='!w-full !h-full object-cover aspect-square' src={ attributes.imageUrl } alt={ attributes.imageAlt } />
							<Button
								isDestructive
								label={ __( 'Remove image', 'ap-blocks' ) }
								onClick={ () => setAttributes( { 
									imageAlt: '',
									imageUrl: '',
								} ) }
								className="absolute left-0 bottom-0 bg-white"
							>
								{ __( 'Remove image', 'ap-blocks' ) }
							</Button>
						</div>
					) : (
						<MediaUploadCheck>
							<MediaPlaceholder
								icon={ 'format-image' }
								labels={ {
									title: __( 'Add image', 'ap-blocks' ),
								} }
								accept="image/*"
								allowedTypes={ ['image'] }
								multiple={ false }
								onSelect={ ( image ) => setAttributes( { 
									imageAlt: image.alt,
									imageUrl: image.url,
								} ) }
								className='!min-h-full'
							/>
						</MediaUploadCheck>
					) }
				</>
			) }
		</div>
	);
}
