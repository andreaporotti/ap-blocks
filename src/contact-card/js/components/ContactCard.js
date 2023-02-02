/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

export default function ContactCard( attributes ) {
    // List of workplaces.
	const workplaces = {
		'office': 'Office',
		'home'  : 'Home',
		'hybrid': 'Hybrid',
	}

    // Card alignment.
    const alignment = {
        'left' : 'mr-auto',
        'center' : 'mx-auto',
        'right' : 'ml-auto',
    }

    return (
        <div className={ 'w-80 p-2 border border-solid border-gray-300 rounded-lg ' + alignment[attributes.align] }>
            { attributes.imageUrl && (
            	<img className="apcc-image w-full rounded-lg" src={ attributes.imageUrl } alt={ attributes.imageAlt } />
            ) }

            <div className="apcc-full-name py-1 px-2 mb-3 text-xl font-semibold border-0 border-b border-solid border-gray-300 rounded-lg">{ attributes.fullName }</div>

            <span className="apcc-label block mt-2 text-sm font-semibold text-gray-500">{ __( 'Job title', 'ap-blocks' ) }</span>
            <div className="apcc-job-title text-base m-0">{ attributes.jobTitle }</div>

            <span className="apcc-label block mt-2 text-sm font-semibold text-gray-500">{ __( 'Email', 'ap-blocks' ) }</span>
            <div className="apcc-email text-base m-0">{ attributes.email }</div>

            <span className="apcc-label block mt-2 text-sm font-semibold text-gray-500">{ __( 'Workplace', 'ap-blocks' ) }</span>
            <div className="apcc-workplace text-base m-0">{ workplaces[attributes.workplace] }</div>

            <span className="apcc-label block mt-2 text-sm font-semibold text-gray-500">{ __( 'About', 'ap-blocks' ) }</span>
            <p className="apcc-description text-base m-0">{ attributes.description }</p>
        </div>
    )
}