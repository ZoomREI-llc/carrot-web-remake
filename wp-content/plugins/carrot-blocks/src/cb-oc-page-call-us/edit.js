import { __ } from "@wordpress/i18n";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { PanelBody, SelectControl, TextControl } from "@wordpress/components";
import "./editor.css";

export default function Edit({ attributes, setAttributes }) {
	const { selectedMarket, formId, phoneNumber } = attributes;

	const onChangeFormId = (newFormId) => {
		setAttributes({ formId: newFormId });
	};

	const onChangePhoneNumber = (newPhoneNumber) => {
		setAttributes({ phoneNumber: newPhoneNumber });
	};

	const onChangeSelectedMarket = (newMarket) => {
		setAttributes({ selectedMarket: newMarket });
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
							{ label: "Kansas City", value: "Kansas City" },
							{ label: "San Francisco", value: "San Francisco Bay Area" },
							{ label: "St. Louis", value: "St. Louis" },
							{ label: "Detroit", value: "Metro Detroit" },
							{ label: "Cleveland", value: "Cleveland" },
							{ label: "Indianapolis", value: "Indianapolis" },
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
			<h3>{__("Carrot Call us (cb-oc-page)", "carrot-blocks")}</h3>
		</div>
	);
}
