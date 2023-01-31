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

    return (
        <>
            { attributes.imageUrl && (
            	<img className="apcc-image w-full rounded-lg" src={ attributes.imageUrl } alt={ attributes.imageAlt } />
            ) }

            <div className="apcc-full-name py-1 px-2 mb-3 text-xl font-semibold border-0 border-b border-solid border-gray-300 rounded-lg">{ attributes.fullName }</div>

            <span className="apcc-label block mt-2 text-sm font-semibold text-gray-500">{ __( 'Job title', 'ap-contact-card' ) }</span>
            <div className="apcc-job-title text-base m-0">{ attributes.jobTitle }</div>

            <span className="apcc-label block mt-2 text-sm font-semibold text-gray-500">{ __( 'Email', 'ap-contact-card' ) }</span>
            <div className="apcc-email text-base m-0">{ attributes.email }</div>

            <span className="apcc-label block mt-2 text-sm font-semibold text-gray-500">{ __( 'Workplace', 'ap-contact-card' ) }</span>
            <div className="apcc-workplace text-base m-0">{ workplaces[attributes.workplace] }</div>

            <span className="apcc-label block mt-2 text-sm font-semibold text-gray-500">{ __( 'About', 'ap-contact-card' ) }</span>
            <p className="apcc-description text-base m-0">{ attributes.description }</p>
        </>
    )
}