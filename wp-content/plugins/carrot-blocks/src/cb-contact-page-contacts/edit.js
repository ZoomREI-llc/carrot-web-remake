import { __ } from "@wordpress/i18n";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { PanelBody, SelectControl, TextControl } from "@wordpress/components";
import "./editor.css";

export default function Edit({ attributes, setAttributes }) {
	const { formId, selectedMarket, phoneNumber, streetName, cityName } =
		attributes;

	// Function to handle the change of selected market
	const onChangeSelectedMarket = (newMarket) => {
		setAttributes({ selectedMarket: newMarket });
	};

	// Function to handle the change of phone number
	const onChangePhoneNumber = (newPhoneNumber) => {
		setAttributes({ phoneNumber: newPhoneNumber });
	};
	// Function to handle the change of phone number
	const onChangeCityName = (newCityName) => {
		setAttributes({ cityName: newCityName });
	};
	// Function to handle the change of phone number
	const onChangeStreetName = (newStreetName) => {
		setAttributes({ streetName: newStreetName });
	};

	// Function to handle the change of form ID
	const onChangeFormId = (newFormId) => {
		setAttributes({ formId: newFormId });
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
							{ label: "San Francisco", value: "sf" },
							{ label: "St. Louis", value: "stl" },
							{ label: "Kansas City", value: "kc" },
							{ label: "Detroit", value: "det" },
							{ label: "Cleveland", value: "cle" },
							{ label: "Indianapolis", value: "ind" },
						]}
						onChange={onChangeSelectedMarket}
					/>
				</PanelBody>
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
					<TextControl
						label={__("City", "carrot-blocks")}
						value={cityName}
						onChange={onChangeCityName}
						placeholder={__("Enter city", "carrot-blocks")}
					/>
					<TextControl
						label={__("Street", "carrot-blocks")}
						value={streetName}
						onChange={onChangeStreetName}
						placeholder={__("Enter street", "carrot-blocks")}
					/>
				</PanelBody>
			</InspectorControls>
			<h3>
				{__("Carrot Block Contacts(cb-contact-page-contacts)", "carrot-blocks")}
			</h3>
		</div>
	);
}
