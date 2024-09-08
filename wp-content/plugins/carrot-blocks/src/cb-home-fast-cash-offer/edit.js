import { __ } from "@wordpress/i18n";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { PanelBody, SelectControl, TextControl } from "@wordpress/components";
import "./editor.css";

export default function Edit({ attributes, setAttributes }) {
	// const { formId } = attributes;
	const { selectedCity, formId } = attributes;

	const onChangeFormId = (newFormId) => {
		setAttributes({ formId: newFormId });
	};

	const onChangeSelectedCity = (newCity) => {
		setAttributes({ selectedCity: newCity });
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
					title={__("City Selection", "carrot-blocks")}
					initialOpen={true}
				>
					<SelectControl
						label={__("Select City", "carrot-blocks")}
						value={selectedCity}
						options={[
							{
								label: "Kansas City",
								value: "Kansas City",
							},
							{ label: "San Francisco", value: "San Francisco" },
							{ label: "St. Louis", value: "St. Louis" },
							{ label: "Detroit", value: "Detroit" },
							{ label: "Cleveland", value: "Cleveland" },
							{
								label: "Indianapolis",
								value: "Indianapolis",
							},
						]}
						onChange={onChangeSelectedCity}
					/>
				</PanelBody>
			</InspectorControls>
			<h3>{__("Carrot Fast Cash Offer (cb-home)", "carrot-blocks")}</h3>
		</div>
	);
}
