import { __ } from "@wordpress/i18n";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { PanelBody, SelectControl, TextControl } from "@wordpress/components";
import "./editor.css";

export default function Edit({ attributes, setAttributes }) {
	const { formId, phoneNumber } = attributes;

	// Function to handle the change of phone number
	const onChangePhoneNumber = (newPhoneNumber) => {
		setAttributes({ phoneNumber: newPhoneNumber });
	};

	// Function to handle the change of form ID
	const onChangeFormId = (newFormId) => {
		setAttributes({ formId: newFormId });
	};

	return (
		<div {...useBlockProps()}>
			<InspectorControls>
				<PanelBody
					title={__("Form Settings", "carrot-blocks")}
					initialOpen={true}
				>
					<TextControl
						label={__("Form ID", "carrot-blocks")}
						value={formId}
						onChange={onChangeFormId}
						placeholder={__("Enter Form ID", "carrot-blocks")}
					/>
				</PanelBody>
				<PanelBody
					title={__("Contact Settings", "carrot-blocks")}
					initialOpen={true}
				>
					<TextControl
						label={__("Phone Number", "carrot-blocks")}
						value={phoneNumber}
						onChange={onChangePhoneNumber}
						placeholder={__("Enter Phone Number", "carrot-blocks")}
					/>
				</PanelBody>
			</InspectorControls>
			<h3>
				{__(
					"Carrot Block Popup Contact Form(cb-popup-contact-form)",
					"carrot-blocks",
				)}
			</h3>
		</div>
	);
}
