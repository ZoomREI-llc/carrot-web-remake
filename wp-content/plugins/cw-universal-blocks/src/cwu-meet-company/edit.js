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
				<PanelBody title={__("Select Market", "cw-universal-blocks")}>
					<SelectControl
						label={__("Choose a Market", "cw-universal-blocks")}
						value={selectedMarket}
						options={[
							{ label: "St. Louis", value: "St. Louis, Missouri" },
							{ label: "San Francisco", value: "the Bay Area" },
							{ label: "Kansas City", value: "Kansas City" },
							{ label: "Detroit", value: "Metro Detroit" },
							{ label: "Cleveland", value: "Cleveland" },
							{ label: "Indianapolis", value: "Indianapolis" },
						]}
						onChange={onChangeMarket}
					/>
				</PanelBody>
			</InspectorControls>

			<h3>{__("cwu Meet Chris Placeholder", "cw-universal-blocks")}</h3>
		</div>
	);
}