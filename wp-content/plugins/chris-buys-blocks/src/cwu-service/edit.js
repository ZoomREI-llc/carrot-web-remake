import { __ } from "@wordpress/i18n";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { PanelBody, SelectControl } from "@wordpress/components";
import "./editor.css";

export default function Edit({ attributes, setAttributes }) {
	const { selectedMarket } = attributes;

	const onChangeMarket = (newMarket) => {
		setAttributes({ selectedMarket: newMarket });
	};

	return (
		<div {...useBlockProps()}>
			<InspectorControls>
				<PanelBody title={__("Select Market", "chris-buys-blocks")}>
					<SelectControl
						label={__("Choose a Market", "chris-buys-blocks")}
						value={selectedMarket}
						options={[
							{ label: "St. Louis", value: "stl" },
							{ label: "San Francisco", value: "sf" },
							{ label: "Kansas City", value: "kc" },
							{ label: "Detroit", value: "det" },
							{ label: "Cleveland", value: "cle" },
							{ label: "Indianapolis", value: "ind" },
						]}
						onChange={onChangeMarket}
					/>
				</PanelBody>
			</InspectorControls>

			<h3>{__("cwu Service Placeholder", "chris-buys-blocks")}</h3>
		</div>
	);
}
