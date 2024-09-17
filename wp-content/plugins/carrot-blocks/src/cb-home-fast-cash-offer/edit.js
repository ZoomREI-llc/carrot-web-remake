import { __ } from "@wordpress/i18n";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { PanelBody, SelectControl, TextControl } from "@wordpress/components";
import "./editor.css";

export default function Edit({ attributes, setAttributes }) {
	const { selectedCity, formId, phoneNumber } = attributes;

	const phoneNumbers = {
		"Kansas City": "(816) 239-3605",
		"San Francisco": "(510) 680-2714",
		"St. Louis": "(314) 671-0956",
		Detroit: "(313) 217-9851",
		Cleveland: "(216) 677-2169",
		Indianapolis: "(317) 526-4712",
	};

	const onChangeSelectedCity = (newCity) => {
		setAttributes({
			selectedCity: newCity,
			phoneNumber: phoneNumbers[newCity] || "",
		});
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
						onChange={(newFormId) => setAttributes({ formId: newFormId })}
						placeholder={__("Enter Form ID", "carrot-blocks")}
					/>
				</PanelBody>
				<PanelBody
					title={__("City Selection", "carrot-blocks")}
					initialOpen={true}
				>
					<SelectControl
						label={__("Select City", "carrot-blocks")}
						value={selectedCity}
						options={[
							{ label: "Kansas City", value: "Kansas City" },
							{ label: "San Francisco", value: "San Francisco" },
							{ label: "St. Louis", value: "St. Louis" },
							{ label: "Detroit", value: "Detroit" },
							{ label: "Cleveland", value: "Cleveland" },
							{ label: "Indianapolis", value: "Indianapolis" },
						]}
						onChange={onChangeSelectedCity}
					/>
				</PanelBody>
			</InspectorControls>
			<h3>{__("Carrot Fast Cash Offer (cb-home)", "carrot-blocks")}</h3>
		</div>
	);
}
