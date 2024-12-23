import { __ } from "@wordpress/i18n";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { useState, useEffect } from "@wordpress/element";
import { PanelBody, TextControl, SelectControl, Button, TextareaControl, IconButton } from "@wordpress/components";
import "./editor.css";

export default function Edit({ attributes, setAttributes }) {
	const { faqs } = attributes;

	const [faqState, setFaqState] = useState(faqs || []);

	useEffect(() => {
		setAttributes({ faqs: faqState });
	}, [faqState]);

	const icons = {
		mail: '/wp-content/plugins/cw-universal-blocks/src/faq-accordions/assets/mail.svg',
		graphs: '/wp-content/plugins/cw-universal-blocks/src/faq-accordions/assets/graphs.svg',
		hammer: '/wp-content/plugins/cw-universal-blocks/src/faq-accordions/assets/hammer.svg',
		car: '/wp-content/plugins/cw-universal-blocks/src/faq-accordions/assets/car.svg',
		map: '/wp-content/plugins/cw-universal-blocks/src/faq-accordions/assets/map.svg',
		info: '/wp-content/plugins/cw-universal-blocks/src/faq-accordions/assets/info.svg',
	};

	const addCategory = () => {
		const newFaqs = [...faqState, { category: "New Category", icon: "", items: [] }];
		setFaqState(newFaqs);
	};

	const updateCategory = (categoryIndex, value) => {
		const newFaqs = [...faqState];
		newFaqs[categoryIndex].category = value;
		setFaqState(newFaqs);
	};

	const updateCategoryIcon = (categoryIndex, value) => {
		const newFaqs = [...faqState];
		newFaqs[categoryIndex].icon = value;
		setFaqState(newFaqs);
	};

	const addQuestion = (categoryIndex) => {
		const newFaqs = [...faqState];
		newFaqs[categoryIndex].items.push({ question: "", answer: "" });
		setFaqState(newFaqs);
	};

	const updateQuestion = (categoryIndex, questionIndex, value, field) => {
		const newFaqs = [...faqState];
		newFaqs[categoryIndex].items[questionIndex][field] = value;
		setFaqState(newFaqs);
	};

	const removeQuestion = (categoryIndex, questionIndex) => {
		const newFaqs = [...faqState];
		newFaqs[categoryIndex].items.splice(questionIndex, 1);
		setFaqState(newFaqs);
	};

	const removeCategory = (categoryIndex) => {
		const newFaqs = [...faqState];
		newFaqs.splice(categoryIndex, 1);
		setFaqState(newFaqs);
	};

	let iconsSelectOpts = [
		{
			label: 'None',
			value: '',
		}
	]
	Object.keys(icons).forEach((key) => {
		iconsSelectOpts.push({
			label: key,
			value: key
		})
	})

	return (
		<div {...useBlockProps()}>
			<h3>{__("FAQ Accordions", "cw-universal-blocks")}</h3>

			{faqState.map((faq, categoryIndex) => (
				<div key={categoryIndex} className="faq-category">
					<div className="faq-category__title">

						{faq.icon && (
							<img src={icons[faq.icon]} alt={faq.icon} style={{ width: '24px', height: '24px' }} />
						)}
						<TextControl
							label={__("Category Name", "cw-universal-blocks")}
							value={faq.category}
							onChange={(value) => updateCategory(categoryIndex, value)}
						/>

						<SelectControl
							label={__("Icon", "cw-universal-blocks")}
							value={faq.icon}
							options={iconsSelectOpts}
							onChange={(value) => updateCategoryIcon(categoryIndex, value)}
						/>

						<IconButton
							icon="trash"
							label={__("Delete Category", "cw-universal-blocks")}
							onClick={() => removeCategory(categoryIndex)}
							className="remove-category"
						/>
					</div>

					{faq.items.map((item, questionIndex) => (
						<div key={questionIndex} className="faq-item">
							<div className="faq-item__wrap">
								<TextControl
									label={__("Question", "cw-universal-blocks")}
									value={item.question}
									onChange={(value) =>
										updateQuestion(categoryIndex, questionIndex, value, "question")
									}
								/>
								<TextareaControl
									label={__("Answer", "cw-universal-blocks")}
									value={item.answer}
									onChange={(value) =>
										updateQuestion(categoryIndex, questionIndex, value, "answer")
									}
								/>
							</div>

							<IconButton
								icon="trash"
								label={__("Delete Question", "cw-universal-blocks")}
								onClick={() => removeQuestion(categoryIndex, questionIndex)}
								className="remove-question"
							/>
						</div>
					))}

					<Button
						isPrimary
						onClick={() => addQuestion(categoryIndex)}
					>
						{__("Add Question", "cw-universal-blocks")}
					</Button>
				</div>
			))}

			<Button isPrimary onClick={addCategory}>
				{__("Add Category", "cw-universal-blocks")}
			</Button>
		</div>
	);
}
