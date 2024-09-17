import { __ } from "@wordpress/i18n";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { PanelBody, SelectControl } from "@wordpress/components";
import "./editor.css";

export default function Edit({ attributes, setAttributes }) {
	const { selectedMarket, marketLink } = attributes;

	// Map each market to its respective link
	const marketLinks = {
		"Chris Buys Homes in Kansas City":
			"https://www.kcmo.gov/city-hall/departments/city-planning-development/permits-division",
		"John Buys Bay Area Houses": "https://sfdbi.org/permit-services",
		"Chris Buys Homes in St. Louis":
			"https://www.stlouis-mo.gov/government/departments/public-safety/building/request-an-interior-residential-property-inspection.cfm",
		"Chris Buys Homes in Detroit":
			"https://detroitmi.gov/forms/request-certificate-occupancy-c-o",
		"Chris Buys Homes in Cleveland":
			"https://www.clevelandohio.gov/CityofCleveland/Home/Government/CityAgencies/BuildingHousing/FormsPublications",
		"Chris Buys Homes in Indianapolis":
			"https://www.indy.gov/activity/certificate-of-occupancy",
	};

	const onChangeSelectedMarket = (newMarket) => {
		const link = marketLinks[newMarket] || "#"; // Fallback to '#' if no link found
		setAttributes({
			selectedMarket: newMarket,
			marketLink: link, // Store the appropriate link
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
							{
								label: "Kansas City",
								value: "Chris Buys Homes in Kansas City",
							},
							{ label: "San Francisco", value: "John Buys Bay Area Houses" },
							{ label: "St. Louis", value: "Chris Buys Homes in St. Louis" },
							{ label: "Detroit", value: "Chris Buys Homes in Detroit" },
							{ label: "Cleveland", value: "Chris Buys Homes in Cleveland" },
							{
								label: "Indianapolis",
								value: "Chris Buys Homes in Indianapolis",
							},
						]}
						onChange={onChangeSelectedMarket}
					/>
				</PanelBody>
			</InspectorControls>
			<h3>{__("Carrot No Inspectors (cb-home)", "carrot-blocks")}</h3>
		</div>
	);
}
