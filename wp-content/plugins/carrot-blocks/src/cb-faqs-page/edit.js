import { __ } from "@wordpress/i18n";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { PanelBody, SelectControl, TextControl } from "@wordpress/components";
import "./editor.css";

export default function Edit({ attributes, setAttributes }) {
	const { formId7, formId16, selectedMarket, phoneNumber } = attributes;

	// Function to handle the change of selected market
	const onChangeSelectedMarket = (newMarket) => {
		setAttributes({ selectedMarket: newMarket });
	};

	// Function to handle the change of phone number
	const onChangePhoneNumber = (newPhoneNumber) => {
		setAttributes({ phoneNumber: newPhoneNumber });
	};

	// Function to handle the change of form ID
	const onChangeFormId7 = (newFormId) => {
		setAttributes({ formId7: newFormId });
	};
	const onChangeFormId16 = (newFormId) => {
		setAttributes({ formId16: newFormId });
	};

	return (
		<div {...useBlockProps()}>
			<InspectorControls>
				<PanelBody
					title={__("Market Selection", "carrot-blocks")}
					initialOpen={true}
				>
					<SelectControl
						label={__("Select Market", "carrot-blocks")}
						value={selectedMarket}
						options={[
							{ label: "San Francisco", value: "San Francisco" },
							{ label: "St. Louis", value: "St. Louis" },
							{ label: "Kansas City", value: "Kansas City" },
							{ label: "Detroit", value: "Detroit" },
							{ label: "Cleveland", value: "Cleveland" },
							{ label: "Indianapolis", value: "Indianapolis" },
						]}
						onChange={onChangeSelectedMarket}
					/>
				</PanelBody>
				<PanelBody
					title={__("Form Settings", "carrot-blocks")}
					initialOpen={true}
				>
					<TextControl
						label={__("Form ID #7", "carrot-blocks")}
						value={formId7}
						onChange={onChangeFormId7}
						placeholder={__("Enter Form ID questions 7", "carrot-blocks")}
					/>
					<TextControl
						label={__("Form ID #16", "carrot-blocks")}
						value={formId16}
						onChange={onChangeFormId16}
						placeholder={__("Enter Form ID question 16", "carrot-blocks")}
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

			<h3>{__("Carrot block Faqs (cb-faqs-page)", "carrot-blocks")}</h3>
		</div>
	);
}
