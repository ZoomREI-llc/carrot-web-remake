import { __ } from "@wordpress/i18n";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { PanelBody, SelectControl } from "@wordpress/components";
import "./editor.css";

export default function Edit({ attributes, setAttributes }) {
	const { selectedMarket, firstMarketMention, secondMarketMention } =
		attributes;

	// Updated mapping of markets to their respective text mentions and URLs
	const marketMentions = {
		"Kansas City": {
			firstMarketMention: "Kansas City",
			secondMarketMention: "Kansas City",
			avoidCommissionsLink:
				"https://www.upnest.com/re/realtor-commissions/kansas-city-mo",
		},
		"San Francisco Bay Area": {
			firstMarketMention: "the San Francisco bay area",
			secondMarketMention: "SF bay area, CA",
			avoidCommissionsLink:
				"https://www.financialsamurai.com/what-does-it-cost-to-sell-a-house-a-look-at-the-commissions-taxes-and-fees/",
		},
		"St. Louis": {
			firstMarketMention: "Saint Louis",
			secondMarketMention: "St. Louis",
			avoidCommissionsLink:
				"https://stlouisrealestatenews.com/legislative-regulatory/who-pays-the-buyers-agent/",
		},
		"Metro Detroit": {
			firstMarketMention: "Detroit",
			secondMarketMention: "Metro Detroit",
			avoidCommissionsLink:
				"https://www.listingbidder.com/real-estate-commission-rates/real-estate-commission-rate-detroit-warren-dearborn-michigan/",
		},
		Cleveland: {
			firstMarketMention: "Cleveland",
			secondMarketMention: "Cleveland",
			avoidCommissionsLink:
				"https://www.listingbidder.com/real-estate-commission-rates/real-estate-commission-rate-cleveland-elyria-ohio/",
		},
		Indianapolis: {
			firstMarketMention: "Indianapolis",
			secondMarketMention: "Indianapolis",
			avoidCommissionsLink:
				"https://www.listingbidder.com/real-estate-commission-rates/real-estate-commission-rate-indianapolis-carmel-anderson-indiana/",
		},
	};

	const onChangeSelectedMarket = (newMarket) => {
		const mentions = marketMentions[newMarket] || {
			firstMarketMention: "Your Area",
			secondMarketMention: "Your Area",
			avoidCommissionsLink: "#",
		};

		setAttributes({
			selectedMarket: newMarket,
			firstMarketMention: mentions.firstMarketMention,
			secondMarketMention: mentions.secondMarketMention,
			avoidCommissionsLink: mentions.avoidCommissionsLink, // Store the link in attributes
		});
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
			</InspectorControls>
			<h3>{__("Carrot We Can Help (cb-home)", "carrot-blocks")}</h3>
		</div>
	);
}
