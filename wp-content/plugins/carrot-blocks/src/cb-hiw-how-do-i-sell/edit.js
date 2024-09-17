import { __ } from "@wordpress/i18n";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { PanelBody, SelectControl, TextControl } from "@wordpress/components";
import "./editor.css";

export default function Edit({ attributes, setAttributes }) {
	const { selectedMarket, phoneNumber, formId } = attributes;

	const onChangeFormId = (newFormId) => {
		setAttributes({ formId: newFormId });
	};
	const onChangeSelectedMarket = (newMarket) => {
		setAttributes({ selectedMarket: newMarket });
	};
	// Function to handle the change of phone number
	const onChangePhoneNumber = (newPhoneNumber) => {
		setAttributes({ phoneNumber: newPhoneNumber });
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
					title={__("Market Selection", "carrot-blocks")}
					initialOpen={true}
				>
					<SelectControl
						label={__("Select Market", "carrot-blocks")}
						value={selectedMarket}
						options={[
							{ label: "San Francisco", value: "San Francisco Bay Area, CA" },
							{ label: "St. Louis", value: "St. Louis, MO" },
							{ label: "Kansas City", value: "Kansas City" },
							{ label: "Detroit", value: "Metro Detroit, MI" },
							{ label: "Cleveland", value: "Cleveland, OH" },
							{ label: "Indianapolis", value: "Indianapolis, IN" },
						]}
						onChange={onChangeSelectedMarket}
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
			<h3>{__("Carrot How do i sell (cb-him)", "carrot-blocks")}</h3>
		</div>
	);
}
