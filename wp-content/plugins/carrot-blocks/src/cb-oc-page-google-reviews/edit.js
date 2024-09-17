import { __ } from "@wordpress/i18n";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { PanelBody, SelectControl } from "@wordpress/components";
import "./editor.css";

export default function Edit({ attributes, setAttributes }) {
	const { selectedMarket, reviewText, reviewerName, selectedDirection } =
		attributes;

	const reviews = {
		"Independence, MO": {
			reviewText:
				"Chris worked with us through all odds, even when others failed us. He has gone way beyond what he needed to do to make us feel secure in this transaction! We greatly appreciate his character and honesty as a professional in this business. He showed true compassion. Thank you, Chris and God bless you! Bill",
			reviewerName: "Bill S. [Independence, MO]",
		},
		"Overland Park, KS": {
			reviewText:
				"Our house was in terrible condition, Chris helped us and bought it as is! He paid us great price! in cash !! We would never been able to get such price for it!!! Thank you Chris! You’re the best.",
			reviewerName: "Brett J. H. [Overland Park, KS]",
		},
		"Kansas City, MO": {
			reviewText:
				"I am quite happy with the easy, fast, nearly stress free process of dealing with Chris Buys Homes in Kansas City. I live far away from this property and didn’t have the conections with contractors etc…. needed to rehab this property that sat vacant too long. They made a reasonable offer and the sale went quickly with prompt payment. Thanks again Chris Buys for making it so easy!",
			reviewerName: "Darren P. [Kansas City, MO]",
		},
	};

	const onChangeSelectedMarket = (newMarket) => {
		const { reviewText, reviewerName } = reviews[newMarket] || {
			reviewText:
				"Chris worked with us through all odds, even when others failed us. He has gone way beyond what he needed to do to make us feel secure in this transaction! We greatly appreciate his character and honesty as a professional in this business. He showed true compassion. Thank you, Chris and God bless you! Bill",
			reviewerName: "Bill S. [Independence, MO]",
		};
		// Set the selected market and corresponding review content
		setAttributes({
			selectedMarket: newMarket,
			reviewText: reviewText,
			reviewerName: reviewerName,
		});
	};

	const onChangeSelectedDirection = (newDirection) => {
		setAttributes({ selectedDirection: newDirection });
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
							{ label: "Independence, MO", value: "Independence, MO" },
							{ label: "Overland Park, KS", value: "Overland Park, KS" },
							{ label: "Kansas City, MO", value: "Kansas City, MO" },
						]}
						onChange={onChangeSelectedMarket}
					/>
				</PanelBody>
				<PanelBody
					title={__("Direction Select", "carrot-blocks")}
					initialOpen={true}
				>
					<SelectControl
						label={__("Select Direction", "carrot-blocks")}
						value={selectedDirection}
						options={[
							{ label: "icon-left", value: "ltr" },
							{ label: "icon-right", value: "rtl" },
						]}
						onChange={onChangeSelectedDirection}
					/>
				</PanelBody>
			</InspectorControls>
			<h3>{__("Carrot Google Reviews (cb-oc-page)", "carrot-blocks")}</h3>
		</div>
	);
}
